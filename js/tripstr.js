console.log('Successfully loaded tripstr JS');

function confirmation(url) {
    window.location.href = url;
}

// confirmation('process-delete.php?accoId=1');

document.getElementById("cancelDelete").addEventListener("click", function () {
    document.getElementById("popupId").remove();
});
document.getElementById("cancelDelete").addEventListener("click", function () {
    document.getElementById("popupId").remove();
});