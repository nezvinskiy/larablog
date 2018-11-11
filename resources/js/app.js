
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

$(document).ready(function() {

    $('#flash-overlay-modal').modal();

    $("#formComment").submit(function(event) {

        let form = $(this);
        let url = form.attr('action');

        let errorList = $('#formCommentErrorList');

        let commentTemplate = $('.js-comment-template');
        let commentList = $('#commentList');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(response) {

                let comment = commentTemplate.clone()
                    .removeClass('js-comment-template d-none');

                comment.appendTo(commentList);

                comment.find('.js-comment-author').text(response.data.author);
                comment.find('.js-comment-date').text(response.data.created_at);
                comment.find('.js-comment-content').text(response.data.content);
            },
            error: function(data) {
                let response = data.responseJSON.errors;

                errorList.html('');

                if (response) {
                    $.each(response, function(i) {
                        errorList.append('<li>' + response[i] + '</li>');
                    });
                }
            }
        });

        event.preventDefault();
    });
});
