$(document).ready(function() {
  $('#btnLogin').click(function() {
    var username = $('#username').val(), password = $('#password').val();
    if (username === '' || password === '') {
      $('#errorMsg').text('Fill required fields.');
    } else {
      $('#spinner').modal('show');
      console.log($('#username').val());
      console.log($('#password').val());
      $.ajax({
        type: 'POST',
        url: '../services/LoginService.php',
        data: {
          username: username,
          password: password,
          action: 'SIGNIN'
        }
      }).done(function(response) {
        console.log('Waow');
        var r = JSON.parse(response);
        if (r.isValid === 'N') {
          $('#errorMsg').text(r.message);
        } else {
          $('#errorMsg').text('');
          window.location.href = '../views/home.php';
        }
        hideModal();
        // $('body').removeClass('modal-open');
        // $('body').css('padding-right', '');
        // $("#spinner").hide();
      });
    }
  });
}());
