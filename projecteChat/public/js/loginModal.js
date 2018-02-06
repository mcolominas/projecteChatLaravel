/*$("#myModal .modal-footer button").click(function(){
    var username=$("#myModal input[name=username]").val();
    var password=$("#myModal input[name=password]").val();
    $.post("demo_test_post.asp",
    {
        name: "Donald Duck",
        city: "Duckburg"
    },
    function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    });
});*/

$(document).ready(function(){
    $('#modalLogin .modal-footer button').click(function(){
    var button = $(this);

    if ( button.attr("data-dismiss") != "modal" ){
      var inputs = $('#modalLogin form input');
      var title = $('#modalLogin .modal-title');
      var progress = $('#modalLogin .progress');
      var progressBar = $('#modalLogin .progress-bar');

      //inputs.attr("disabled", "disabled");

      button.hide();

      progress.show();

      progressBar.animate({width : "100%"}, 100);

      progress.delay(1000)
          .fadeOut(600);

      button.text("Close")
          .removeClass("btn-primary")
          .addClass("btn-success")
            .blur()
          .delay(1600)
          .fadeIn(function(){
            title.text("Log in is successful");
            button.attr("data-dismiss", "modal");
          });
    }
  });

  /*$('#myModal').on('hidden.bs.modal', function (e) {
    var inputs = $('form input');
    var title = $('.modal-title');
    var progressBar = $('.progress-bar');
    var button = $('.modal-footer button');

    inputs.removeAttr("disabled");

    title.text("Log in");

    progressBar.css({ "width" : "0%" });

    button.removeClass("btn-success")
        .addClass("btn-primary")
        .text("Ok")
        .removeAttr("data-dismiss");
                
  });*/
});