(function () {
    const deleteBtns = document.querySelectorAll('.delete-btn');
    deleteBtns && deleteBtns.forEach(item => {
        item.addEventListener('click', async function(e) {
            const formData = new FormData();
            formData.append('id', e.target.getAttribute('data-conference'));
            let response = await fetch('/deleteConference', {
                method: 'POST',
                body: formData,
            });
            if (response.ok) {
                window.location.href = '/';
            } else {
                alert("Ошибка HTTP: " + response.status);
            }
        });
    });
})();
