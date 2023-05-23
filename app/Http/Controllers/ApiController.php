<?php

namespace App\Http\Controllers;

use App\Exceptions\BadRequestException;
use App\Models\Posts;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{

    public function requestToChatGPT(String $content) : String {
        $httpClient = new PendingRequest();
        $httpClient->withoutVerifying();

        $body = ["model" => "gpt-3.5-turbo",
            "messages" => [["role" => "user", "content" => $content]]];

        $response = $httpClient->withHeaders([
            "Authorization" => "Bearer " . env('OPEN_AI_SECRET_KEY'),
            "Content-Type" => "application/json"])
            ->post("https://api.openai.com/v1/chat/completions", $body);

        if(!$this->isSuccessful($response->status())){
            throw new BadRequestException();
        }

        return json_decode($response->body(), true)['choices'][0]['message']['content'];
    }

    public function generateImage(String $content) {
        $httpClient = new PendingRequest();
        $httpClient->withoutVerifying();

        $body = ['prompt' => $content, "response_format" => "b64_json", "size" => '512x512'];

        $response = $httpClient->withHeaders([
            "Authorization" => "Bearer " . env('OPEN_AI_SECRET_KEY'),
            "Content-Type" => "application/json"])
            ->post('https://api.openai.com/v1/images/generations', $body);

        if(!$this->isSuccessful($response->status())){
            throw new BadRequestException();
        }

        return json_decode($response->body(), true)['data'][0]['b64_json'];
    }

    public function generateDescription(String $content) : String {
        return $this->requestToChatGPT($content . " (write in 20 words max)");
    }

    public function generateTags(String $content) : String {
        return $this->requestToChatGPT("Write (only without any introduction) 4 words (tags) and separate with comma of text: " . $content);
    }

    public function generatePhoto(Request $request) {
        $formData = $request->validate(['content' => ['required', 'min:3']]);

        /* base64 encoded image */
        $image = $this->generateImage($formData['content']);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(40).'.'.'png';
        \File::put(storage_path(). '/app/public/images/' . $imageName, base64_decode($image));

        $post = new Posts();

        /* set path to photo */
        $post->photo = 'images/' . $imageName;

        /* generate description of photo */
        $post->description = $this->generateDescription($formData['content']);

        /* generate tags */
        $post->tags = $this->generateTags($formData['content']);

        /* set default values of photo model */
        $post->ai = true;
        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect('/user')->with('message', 'Photo was generated successful!');
    }

    public function isSuccessful(int $status) : bool{
        return ($status >= 200 && $status < 300);
    }
}
