$(document).ready(function () {
  // Add click event listener to nav links
  $(".nav-link").click(function (e) {
    e.preventDefault(); // Prevent the default behavior of the anchor tag

    // Remove active class from all nav items
    $(".nav-link").removeClass("active");

    // Add active class to the clicked nav item
    $(this).addClass("active");

    // Load content based on the selected section
    var section = $(this).data("section");
    loadContent(section);
  });

  // Function to load content based on the selected section
  function loadContent(section) {
    // Load content from local HTML files
    $.ajax({
      url: "dashboard/" + section + ".html", // Assuming your content files are in a 'content' folder
      type: "GET",
      dataType: "html",
      success: function (data) {
        $("#dashboard-content").html(data);
      },
      error: function () {
        $("#dashboard-content").html(
          "<p>Failed to load content for " + section + ".</p>"
        );
      },
    });
  }
  // Trigger a click event on the "Home" link to set it as default
  $('.nav-link[data-section="home"]').click();
});
