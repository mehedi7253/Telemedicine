const search = () => {
    const searchbox = document.getElementById("search-item").value.toUpperCase();
    const storeitems = document.getElementById("doctor-list")
    const doctor = document.querySelectorAll(".col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item")
    const pname =storeitems.getElementsByTagName("h4")


  for(var i = 0; i < pname.lenth; i++) {
    let match = product[i]. getElementsByTagName('h4')[0];

    if (match) {
        let textvalue = match.textContent || match.innerHtml

        if(textvalue.toUpperCase().indexOf(searchbox) > -1) {
            product[i].style.display = "";

        } else {
            product[i].style.display = "none";
        }
     }
  }
}