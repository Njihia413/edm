// create voter user account
function createVoterUserAccount() {
  // get voter user account data
  let fullname = document.getElementsByName("full_name")[0].value;
  let password = document.getElementsByName("password")[0].value;
  let confirmPassword = document.getElementsByName("confirm_password")[0].value;
  let nationalId = document.getElementsByName("national_id")[0].value;
  let phoneNumber = document.getElementsByName("phone_number")[0].value;
  let county = document.getElementsByName("county")[0].value;
  let constituency = document.getElementsByName("constituency")[0].value;
  let ward = document.getElementsByName("ward")[0].value;
  // validate voter user account data
  if (fullname.trim() == "") {
    alert("Please enter your full name");
    return false;
  } else if (password == "") {
    alert("Please enter your password");
    return false;
  } else if (confirmPassword == "") {
    alert("Please confirm your password");
    return false;
  } else if (nationalId.trim() == "") {
    alert("Please enter your national id");
    return false;
  } else if (phoneNumber.trim() == "") {
    alert("Please enter your phone number");
    return false;
  } else if (county.trim() == "") {
    alert("Please select your county");
    return false;
  } else if (ward.trim() == "") {
    alert("Please select your ward");
    return false;
  } else if (constituency.trim() == "") {
    alert("Please select your constituency");
    return false;
  } else if (password != confirmPassword) {
    alert("Passwords do not match");
    return false;
  } else {
    let voterId = Math.floor(100000 + Math.random() * 900000);
    // create voter user account
    let voterUserAccount = {
      fullname: fullname,
      password: password,
      nationalId: nationalId,
      phoneNumber: phoneNumber,
      county: county,
      constituency: constituency,
      ward: ward,
      voterId: voterId,
    };
    // send voter user account data to server
    fetch("../../edm/create_voter_user_account.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(voterUserAccount),
    }).then((res) => {
      res.json();
      console.log(res)
      alert(
        "Account created successfully. Proceed to login with the voter id received on sms and the password you provided."
      );
      window.location.href = "../auth/login.php";
    })
    .then((data) => {
      console.log(data);
    });
  }

  return false;
}
