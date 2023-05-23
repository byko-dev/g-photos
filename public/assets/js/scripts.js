const serverURL = "http://localhost:8000";

function incrementLikes(postId, element) {

    let likesCounter = document.getElementById('likes'+postId);
    likesCounter.innerText = (++likesCounter.innerHTML);
    element.classList.add('liked');

    fetch(serverURL + "/increment/" + postId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    }).then(() => {
        element.onclick = null;
    }).catch(() => {})
}
