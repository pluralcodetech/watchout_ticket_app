
let btn = document.getElementById("myBtn");

function generatePdf() {
    const myContent = document.getElementById("content");
    html2pdf(myContent, {
        margin: 1,
        padding: 1,
        filename: 'myfile.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas: {
            scale: 2,
            bottom: 20
        },
        pagebreak: { mode: ['css']},
        jsPDF: {unit: 'mm', format: 'a4', orientation: 'portrait'}

    })

    .set({
        pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
      })
    .from(myContent)
    .save();
}

btn.addEventListener("click", generatePdf);



// Modal styling
const myCancel = document.getElementById("myCancel");
const simpleModal = document.getElementById("simpleModal");
const closeButton = document.getElementsByClassName("closeBtn")[0];
let getButton = document.getElementById("theButton");
const paragraph = document.getElementById("para");

const isLate = document.getElementById("late");
const flightCancelled = document.getElementById("flightCancelled");
const reschedule = document.getElementById("reschedule");

let result;


function firstClick() {
    result = "driver came late";
    flightCancelled.style.display = "none";
    reschedule.style.display = "none";
    getButton.style.display = "block";
    console.log(result);
}
 
isLate.addEventListener("click", firstClick);

function secondClick() {
    result = "flight Cancelled";
    isLate.style.display = "none";
    reschedule.style.display = "none";
    getButton.style.display = "block";
    console.log(result);
}

flightCancelled.addEventListener("click", secondClick);

function thirdClick() {
    result = "Personal plan reschedule";
    isLate.style.display = "none";
    flightCancelled.style.display = "none";
    getButton.style.display = "block";
    console.log(result);
}

reschedule.addEventListener("click", thirdClick);


// Cancel the trip
getButton.addEventListener("click", (e) => {
    e.preventDefault();

    const getLocation = location.href;
    const str = getLocation.split('=');
    const id = str.at(-1);
    console.log(id);

    
    let formData = new FormData();

    formData.append("id", id);
    formData.append("reason", result);


    var requestOptions = {
        method: 'POST',
        body: formData,
        redirect: 'follow'
      };
      
      fetch("https://watchoutachan.herokuapp.com/api/canceltrip", requestOptions)
        .then(response => response.json())
        .then(data => {
            if(data.message === "successfully cleared") {
                paragraph.innerHTML = data.message;
            }
            console.log(data.message);
        })
        // .then(result => console.log(result))
        .catch(error => console.log('error', error));

        

        setTimeout(function() {
            simpleModal.style.display = "none";
        }, 8000);

        myCancel.disabled = true;
});

// Function to open Modal
const openModal = () => {
    simpleModal.style.display = "block";
}

myCancel.addEventListener("click", openModal);

// Function to Close Modal
const closeModal = () => {
    simpleModal.style.display = "none";
}

closeButton.addEventListener("click", closeModal);

// Close modal by clicking anywhere on the page
const clickOutside = (e) => {
    if (e.target === simpleModal) {
        simpleModal.style.display = "none";
    }
}

window.addEventListener("click", clickOutside);





