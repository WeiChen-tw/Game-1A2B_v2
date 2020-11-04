//restart game & clean input
$("#restart").on("click", function () {
  $.get("games/new");
  alert("RESTART GAME");
  $("#inputNum").val("");
  $("#result").text("");
});
$("#start").on("click", function () {
  $.get("games/new");
  alert("START GAME");
  $("#inputNum").val("");
  $("#result").text("");
});

function judg() {
  let num = $("#inputNum").val();
  console.log(num);
  $.ajax({
    url: "games/judg",
    type: "POST",
    data: {
      userNum: num,
    },
    success: function (success) {
      console.log(success.msg);
      console.log(success.result);
      console.log(success.answer);
      $("#result").text(success.result);
      $.get("broadcast/" + num + "&" + success.result);
    },
    error: function (error) {
      console.log(error.msg);
      console.log(error.result);
      console.log(error.answer);
      $("#result").text(error.result);
    },
  });
}
