const courseDropdown = document.getElementById("course");
const majorContainer = document.getElementById("major-container");
const majorDropdown = document.getElementById("major");

// index of courses and its majors
const courseMajors = {
  Education: ["English", "Filipino", "Science" , "Mathematics", "TVL"],
  Business: ["Financial Management", "Human Resource", "Hotel and Restaurant Management", "Hospitality Management"],
  Engineering: ["Mechanical", "Civil", "Chemical", "Computer Engineering"],
  Computer_Studies: [ "Information Technology", "Computer Science", "Industrial Technology"]
};

courseDropdown.addEventListener("change", function() {
  // get the selected course option
  const selectedCourse = courseDropdown.value;

  // if the selected course has majors, populate the majors dropdown
  if (courseMajors[selectedCourse].length > 0) {
    // remove the 'hidden' attribute to show the majors dropdown
    majorContainer.removeAttribute("hidden");

    // clear any previous options in the majors dropdown
    majorDropdown.innerHTML = "";

    // add the new options to the majors dropdown
    courseMajors[selectedCourse].forEach(function(major) {
      const option = document.createElement("option");
      option.value = major;
      option.text = major;
      majorDropdown.add(option);
    });
  } else {
    // hide the majors dropdown if the selected course has no majors
    majorContainer.setAttribute("hidden", "hidden");
  }
});



  // // Get a reference to the button element
  // var success = document.getElementById("enroll");
  
  // // Add a click event listener to the button
  // success.addEventListener("click", function() {
  //   // Show a SweetAlert dialog box
  //   Swal.fire({
  //     title: "Congratulations!",
  //     text: "You Enrolled Successfully!",
  //     icon: "success",
  //     confirmButtonText: "OK"
  //   });
  // });


// function validateForm() {
//     var firstname = document.getElementById("firstName").value;
//     var lastname = document.getElementById("lastName").value;
  
//     if (firstname == "" && lastname == "") {
//       Swal.fire({
//         title: 'Error Occur!',
//         text: 'Something went wrong!',
//         icon: 'error',
//         timer: 8000,
//         allowOutsideClick: false,
//         allowEscapeKey: false
//       }).then(() => {
//         // The user clicked the "OK" button, close the dialog
//         Swal.close();
//       });
      
//       return false;
//     } else {
//       Swal.fire({
//         title: "Congrats!",
//         text: "You Enrolled Successfully!",
//         icon: "success",
//         timer: 8000,
//         allowOutsideClick: false,
//         allowEscapeKey: false
//       }).then(() => {
//         // The user clicked the "OK" button, close the dialog
//         Swal.close();
//       });
      
//       return true;
//     }
//   }
