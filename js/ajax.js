var httpRequest;

function getProductInformation() {
    if (window.XMLHttpRequest) {
        httpRequest = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        httpRequest = new ActiveXObject();
    }
}


// create http request

httpRequest.open("GET", "../php/showProductDetail.php", true);


// set callback function
httpRequest.onreadystatechange = response22();

// get data from the

function response22() {
    // data has been received correctly
    if (httpRequest.readystate == 4) {

        // judge status is 200 or not
        if (httpRequest.state == 200) {


            // get the data from server
            var text = httpRequest.responseText;

            // write the data to the div
            var div = document.getElementById("result");
        }
    }
}