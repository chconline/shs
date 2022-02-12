$(document).ready(function(){
// Make sure that all of the list items are hidden by default.
  $('.theedge_message').hide();

// Set the value of the "heart" list item the one shown by default, until another one is hovered over.
  $('#theedge_result').show();

  $('#thewhatevidence').hover(
    onEnter('#theedge_curriculum'),
    onExit('#theedge_curriculum')
  );

  $("#thewhatacademic").hover(
      onEnter("#theedge_academics"),
      onExit("#theedge_academics")
  );

  $("#thewhatexecutive").hover(
      onEnter("#theedge_executive"),
      onExit("#theedge_executive")
  );

  $("#thewhatsocial").hover(
      onEnter("#theedge_social"),
      onExit("#theedge_social")
  );

  $("#thehowstaff").hover(
      onEnter("#theedge_staff"),
      onExit("#theedge_staff")
  );

  $("#thehowapproach").hover(
      onEnter("#theedge_approach"),
      onExit("#theedge_approach")
  );

  $("#thehowsupport").hover(
      onEnter("#theedge_support"),
      onExit("#theedge_support")
  );

  $("#thehowtech").hover(
	  onEnter("#theedge_tech"),
	  onExit("#theedge_tech")
  );	
	
  $("#theresult").hover(
      onEnter("#theedge_result"),
      onExit("#theedge_result")
  );
	
  function onEnter(selector) {
    return function() {
      $('.theedge_message').hide();
      $(selector).show();
    };
  }
  function onExit(selector) {
    return function() {
      $(selector).hide();
    }
  }

});