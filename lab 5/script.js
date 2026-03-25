function analyzeText() {
    let text = document.getElementById("textInput").value;

    if (text.trim() === "") {
        document.getElementById("result").innerText = "Please enter some text.";
        return; 
    }

    let charcount = text.length;
    let words = text.trim().split(/\s+/);
    let wordcount =  words.length;

    let reversedText = text.split("").reverse().join("");

    document.getElementById("result").innerHTML =
    "<p>Character Count: " + charcount + "</p>" +
    "<p>Word Count: " + wordcount + "</p>" +
    "<p>Reversed Text: " + reversedText + "</p>";


}