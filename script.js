
let btn = document.getElementById("myBtn");

function generatePdf() {
    const myContent = document.getElementById("content");
    html2pdf(myContent, {
        margin: 1,
        filename: 'myfile.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas: {
            scale: 2,
            bottom: 20
        },
        pagebreak: { mode: ['css']},
        jsPDF: {unit: 'mm', format: 'a4', orientation: 'portrait'}

    })

    .set(
        pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
      })
    .from(myContent)
    .save();
}

btn.addEventListener("click", generatePdf);