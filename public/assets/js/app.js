$(document).ready(function () {
    $('.ajaxForm').submit(function (e) {
        e.preventDefault();
        let form = $(this);
        let url = form.attr("action");
        let method = form.attr("method");
        let data = form.serialize();

        $.ajax(url, {
            method:method,
            dataType: "json",
            data:data,
            complete: (xhr) => {
                try {
                    let response, errorText = "", messages;
                    try { // second try catch to avoid syntaxError
                        response = JSON.parse(xhr.responseText);
                    } catch (e) {
                        throw new Error('Unable to process response JSON!');
                    }
                    
                    messages = response.messages || [];
                    if (response.status === 200) {
                        window.location.href = response.redirect;
                        return;
                    } else if (typeof messages === 'object') {
                        $.each(messages, function (index, value) {
                            errorText += value + "<br>";
                        });
                    } else {
                        errorText += messages.error;
                    }
                    throw new Error(errorText);
                } catch (e) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: e.message,
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        allowOutsideClick:false
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })
                } finally {
                    // alert('finally');
                }
            }
        });
    });
});