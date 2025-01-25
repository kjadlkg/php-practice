const mycheck = () => {
  const username = document.myinfo.username;
  const useremail = document.myinfo.useremail;
  const userphone = document.myinfo.userphone;
  const newpw = document.myinfo.newpw;
  const currentpw = document.myinfo.currentpw;

  if (username.value.trim() === "") {
    alert("이름을 입력해주세요.");
    username.focus();
    return false;
  }
  const expNameText = /^[가-힣a-zA-Z0-9]{2,}$/u;
  if (!expNameText.test(username.value)) {
    alert("이름 형식이 맞지 않습니다. 형식에 맞게 입력해주세요.");
    username.focus();
    return false;
  }
  if (username.value.length > 10) {
    alert("이름은 10글자 이하로 입력해주세요.");
    username.focus();
    return false;
  }
  if (useremail.value.trim() === "") {
    alert("이메일을 입력해주세요.");
    useremail.focus();
    return false;
  }
  const expEmailText = /^[a-zA-Z0-9\.\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9\.\-]+$/;
  if (!expEmailText.test(useremail.value)) {
    alert("이메일 형식에 맞지 않습니다.");
    useremail.focus();
    return false;
  }
  if (userphone.value.trim() === "") {
    alert("전화번호를 입력해주세요.");
    userphone.focus();
    return false;
  }
  const expPnText = /^\d{3}\d{3,4}\d{4}$/;
  if (!expPnText.test(userphone.value)) {
    alert("전화번호 형식이 맞지않습니다.");
    userphone.focus();
    return false;
  }
  if (newpw.value != "") {
    if (newpw.value.length < 3 || newpw.value.length > 30) {
      alert("비밀번호는 3자 이상, 30자 이하로 입력해주세요.");
      newpw.focus();
      return false;
    }
  }
  if (currentpw.value.trim() === "") {
    alert("현재 비밀번호를 입력해주세요.");
    currentpw.focus();
    return false;
  }

  return true;
};
