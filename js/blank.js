function checkBlank() {
  const title = document.getElementById("title");
  const content = document.getElementById("content");

  if (title.value == "") {
    alert("제목을 입력하세요.");
    title.focus();
    return false;
  }

  if (content.value == "") {
    alert("내용을 입력하세요.");
    content.focus();
    return false;
  }

  return true;
}
