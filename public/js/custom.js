$( document ).ready(function() {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });

    $(".back").click(function() {
        window.history.back();
    });

    /********* workout form input validation *********/
    $('.duration').blur(function () {
        if (this.value == null || this.value == "" ) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        } else if (this.value.length == 1) {
            this.value = 0 + this.value;
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            $('#duration-valid').show();
        } else if (this.value.length > 2) {
            this.value = this.value.charAt(0) + this.value.charAt(1);
            this.classList.add('is-invalid');
            $('#duration-valid').css('display', 'none');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            $('#duration-valid').show();
        }
    });

    $('.rest').blur(function () {
        if (this.value == null || this.value == "" ) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        } else if (this.value.length == 1) {
            this.value = 0 + this.value;
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            $('#rest-valid').show();
        } else if (this.value.length > 2) {
            this.value = this.value.charAt(0) + this.value.charAt(1);
            this.classList.add('is-invalid');
            $('#rest-valid').css('display', 'none');
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            $('#rest-valid').show();
        }
    });

    $('#weight').blur(function () {
        if (this.value == null || this.value == "" ) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        } else if (this.value.includes(".")) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
            this.value = this.value.split('.', 1);
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        }
    });

    $('#repetitions').blur(function () {
        if (this.value == null || this.value == "" ) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        } else if (this.value.includes(".")) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        } else {
            if (!isNaN(this.value)) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                this.value = parseInt(this.value);
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
                this.value = parseInt(this.value);
            }
        }
    });

    $('#sets').blur(function () {
        if (this.value == null || this.value == "" ) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        } else if (this.value.includes(".")) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        } else {
            if (!isNaN(this.value)) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                this.value = parseInt(this.value);
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
                this.value = parseInt(this.value);
            }
        }
    });

    /********* health form input validation *********/
});