/* Jean Luc */






document.getElementById('quizForm').onsubmit = function() {
    const formData = new FormData(this);

    fetch('submit.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); 
    })
    .catch(error => {
        console.error('Error:', error);
    });

    return false; 
};
