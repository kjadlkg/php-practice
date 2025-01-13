// 중복체크
function decide() {
  document.getElementById("decide").innerHTML =
    "<span style='color:blue;'>사용 가능한 아이디입니다.&nbsp;</span>";
  document.getElementById("decide_id").value =
    document.getElementById("userid").value;
  document.getElementById("userid").disabled = true;
  document.getElementById("join_button").disabled = false;
  document.getElementById("check_button").value = "다른 ID로 변경";
  document.getElementById("check_button").setAttribute("onclick", "change()");
}
// id 중복 or 변경
function change() {
  document.getElementById("decide").innerHTML =
    "<span style='color:red;'>ID 중복 여부를 확인해주세요.&nbsp;</span>";
  document.getElementById("userid").disabled = false;
  document.getElementById("userid").value = "";
  document.getElementById("join_button").disabled = true;
  document.getElementById("check_button").value = "ID 중복 검사";
  document.getElementById("check_button").setAttribute("onclick", "checkId()");
}
// 충복체크 시 중복여부 확인
function checkId() {
  var userid = document.getElementById("userid").value;
  if (userid) {
    url = "check.php?userid=" + userid;
    window.open(url, "chkid", "width=400, height=200");
  } else {
    alert("아이디를 입력하세요.");
  }
}

// 유효성 검사
const sendit = () => {
  const username = document.registform.name;
  const userid = document.registform.id;
  const userpw = document.registform.password;
  const userpwch = document.registform.password_check;
  const useremail = document.registform.email;
  const userphone = document.registform.phone;

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
  if (userid.value.trim() === "") {
    alert("아이디를 입력해주세요.");
    userid.focus();
    return false;
  }
  if (userid.value.length < 3 || userid.value.length > 20) {
    alert("아이디는 3자 이상, 20자 이하로 입력해주세요.");
    userid.focus();
    return false;
  }
  if (userpw.value.trim() === "") {
    alert("비밀번호를 입력해주세요.");
    userpw.focus();
    return false;
  }
  if (userpw.value.length < 3 || userpw.value.length > 30) {
    alert("비밀번호는 3자 이상, 30자 이하로 입력해주세요.");
    userpw.focus();
    return false;
  }
  if (userpwch.value.trim() === "") {
    alert("비밀번호 확인을 입력해주세요.");
    userpwch.focus();
    return false;
  }
  if (userpw.value !== userpwch.value) {
    alert("비밀번호가 일치하지 않습니다. 다시 입력해주세요.");
    userpwch.focus();
    return false;
  }
  if (useremail.value.trim() === "") {
    alert("이메일을 입력해주세요.");
    useremail.focus();
    return false;
  }
  const expEmailText = /[a-zA-Z0-9]+$/;
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

  return true;
};
