const registerBtn = document.getElementById("registerBtn");
const modal = new bootstrap.Modal(document.getElementById("registerModal"));

registerBtn.onclick = function () {
  modal.show();
};
