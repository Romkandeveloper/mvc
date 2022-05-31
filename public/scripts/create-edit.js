(function () {
    //form
    const form = document.getElementById('create-form');
    form && form.addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData();
        const rows = {
            title: this.title.value,
            country: this.country.value,
            date: this.date.value,
        };
        if (this.latitude.value && this.longitude.value) {
            rows['latitude'] =  this.latitude.value;
            rows['longitude'] = this.longitude.value;
        }

        for (key in rows) {
            formData.append(key, rows[key]);
        }
        const response = await fetch(this.getAttribute('data-path'), {
            method: 'POST',
            body: formData,
        });
        if (response.ok) {
            window.location.href = '/';
        } else {
            alert("Ошибка HTTP: " + response.status);
        }
    });
})();