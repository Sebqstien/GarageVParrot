window.onload = () => {
    const stars = document.querySelectorAll(".bi-star");

    const note = document.querySelector("#note");

    for (star of stars) {
        star.addEventListener("mouseover", function () {
            resetStars();
            this.classList.add("bi-star-fill");
            this.classList.remove("bi-star");

            let previousStar = this.previousElementSibling;

            while (previousStar) {
                previousStar.classList.add("bi-star-fill");
                previousStar.classList.remove("bi-star");
                previousStar = previousStar.previousElementSibling;
            }
        });

        star.addEventListener("click", function () {
            note.value = this.dataset.value;
        });

        star.addEventListener("mouseout", function () {
            resetStars(note.value);
        });
    }

    /**
     * Reset des étoiles en vérifiant la note dans l'input caché
     * @param {number} note 
     */
    function resetStars(note = 0) {
        for (star of stars) {
            if (star.dataset.value > note) {
                star.classList.remove("bi-star-fill");
                star.classList.add("bi-star");
            } else {
                star.classList.add("bi-star-fill");
                star.classList.remove("bi-star");
            }
        }
    }
}
