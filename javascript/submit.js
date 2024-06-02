function goToPage(url) {
    window.location.href = url;
}

function goBack() {
    history.back();
}
function createWordBoxes() {
    var inputText = document.getElementById("inputText");
    var wordContainer = document.getElementById("wordContainer");
    var inputValue = inputText.value.trim(); // Menghapus spasi di awal dan akhir

    // Membersihkan div sebelum menambahkan kata baru
    wordContainer.innerHTML = "";

    // Memecah inputan menjadi array kata-kata
    var words = inputValue.split(' ');

    // Menambahkan setiap kata ke dalam div terpisah
    words.forEach(function(word) {
        var wordDiv = document.createElement("div");
        wordDiv.textContent = word;
        wordDiv.classList.add("word-box");
        wordContainer.appendChild(wordDiv);
    });
}

function notifikasiBack() {
    var notificationDiv = document.getElementById("notification-back");
    notificationDiv.style.display = "block";
}

function cancelBack() {
    var notificationDiv = document.getElementById("notification-back");
    notificationDiv.style.display = "none";
}

