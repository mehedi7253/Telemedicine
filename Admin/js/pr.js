const timeToTake = `<select class="time-to-take mr-2">
                  <option value="1+1+1" selected="">1+1+1</option>
                  <option value="1+0+1">1+0+1</option>
                  <option value="0+1+1">0+1+1</option>
                  <option value="1+0+0">1+0+0</option>
                  <option value="0+0+1">0+0+1</option>
                  <option value="1+1+1+1">1+1+1+1</option>
                </select>`;

const whenToTake = `<select class="when-to-take">
                  <option value="after meal" selected="">After Meal</option>
                  <option value="before meal">Before Meal</option>
                  <option value="take any time">Take Any Time</option>
                </select>`;

$(document).ready(function () {
  $(".pr-left-box input[type='text']").keypress(function (e) {
    if (e.which === 13) {
      // 13 is the enter key
      var toDoText = $(this).val();
      $(this).val("");
      $(this)
        .siblings("ul")
        .append(`<li>${toDoText} <span class='text-danger'>X</span></li>`);
    }
  });

  $(".pr-left-box ul").on("click", "span", function (e) {
    $(this).parent().remove();
    e.stopPropagation();
  });

  $(".pr-prescription-box input[type='text']").keypress(function (e) {
    if (e.which === 13) {
      // 13 is the enter key
      var medicineName = $(this).val();
      $(this).val("");
      $(this).siblings("ul").append(`<li class="mt-3">
        <div class="prescribed-medicine">
            <h6 class="medicine-name">${medicineName} <span class='text-danger'>X</span></li></h6>
            <div class="medicine-taking-period d-flex">
                ${timeToTake}
                ${whenToTake}
            </div>
        </div>
        </li>`);
    }
  });

  $(".pr-prescription-box ul").on("click", "span", function (e) {
    $(this).parents("li").next(".medicine-taking-period").remove();
    $(this).parents("li").remove();
    e.stopPropagation();
  });
});
