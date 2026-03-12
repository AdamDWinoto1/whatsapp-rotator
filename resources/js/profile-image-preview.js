document.addEventListener('DOMContentLoaded', function () {
    window.previewImage = function(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function(){
            const imagePreview = document.getElementById('imagePreview');
            const imageIcon = document.getElementById('imageIcon');
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block';
            imageIcon.style.display = 'none';
        };
        if(input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    };
});
