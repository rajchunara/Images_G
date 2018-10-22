<?php
header('Content-Type: text/css');
?>

/* USER */
#userImage{
  width: 40px;
  height: 40px;
  border-radius: 50%;
}

.bgImage{
  height: 700px;
  background-image: url(../Images/beautiful-calm-clouds-206359.jpg);
  background-repeat: no-repeat;
  background-size: 100% 100%;
}

.headline{
  position:reative;
  top:100px;
  color:#fff;
}

.btn-space{
  margin-right: 20px !important;
}

.Img-Display{
  margin-top: 40px;
}

.Img-Card{
  margin: 30px;
  /* width: 400px; */
  height: 300px;
  margin-right:0px !important;
  margin-left:0px !important;
}

.img-holder{
  padding: 0px;
  margin: 0px;
  width: 100%;
  height: 300px;
  background-repeat: no-repeat;
  background-size: 100% 100%;
}

div.like-holder{
  padding: 0px;
  margin: 0px;
  height: 40px;
  position: relative;
  border-bottom: 1px solid #999999;
  border-right: 1px solid #999999;
  border-left: 1px solid #999999;
}

img.relative{
  width: 30px;
  height: 30px;
  border-radius: 50%;
  position: relative;
  left:5%;
  top: 15%;
}

img.relative:hover{

}

p.no-likes{
  display: inline;
  position: relative;
  left:10%;
  top: 15%;
}

img.download{
  float: right;
  display: inline;
  position: relative;
  right: 10%;
  top: 15%;
}

.signupFormBody{
  width: 500px;
  margin: 150px auto auto auto;
  padding: 30px;
  border: 1px solid #999999;
  border-radius: 10px;
}

.userInfo{
  width: auto;
  margin: auto;
}

.userImage{
  display: inline-block;
  float: left;
  margin: auto;
}

.userName{
  display: inline-block;
  margin: 7px;
}

.sideBtn{
  width: 250px;
}

.logoutBtn{
  display: inline-block;
  float: left;
  margin: 7px;
}

.uploadBtn{
  display: inline-block;
  float: right;
  margin: 7px;
}

.sideBtn2{
  width: 250px;
}

#signup-btn{
  display: inline-block;
  float: right;
  margin: 7px;
}

#login-btn{
  display: inline-block;
  margin: 7px;
  float: right;
}

.imageUploadBody{
  width: 500px;
  margin: 100px auto;

}






/* my-profile.php */

.headerBackgroundImage{
  width: 100%;
  height: 250px;
  background-color: #DCDBDB;
  border-bottom: 3px solid #000000;
}

.profileImageDiv{
  /* display: block;
  float: none;
  position: relative; */
  width: 100px;
  height: 100px;
 margin-left: auto;
 margin-right: auto;
}

.profileImage{
  /* margin-top: 150px; */
  width: 200px;
  height: 200px;
  border: 3px solid #000000;
  border-radius: 50%;
  background-color: #DCDBDB;
  margin: 150px auto 0px auto;
  position: relative;
}

.editicon{
  width: 40px;
  height: 40px;
  position: relative;
  bottom: 210px;
  left: 160px;
}

.profileName{
  width: 200px;
  margin: auto;
  text-align: center
}

.myImagesDiv{
  margin-top: 150px;
}

.profileImagesTitle{
  display: block;
  width: 200px;
  text-align: center;
  font-size: 30px;
}

.modalDefaultImg{
  width: 200px;
  height: 200px;
  display: block;
  margin: auto;
  border: 3px dashed #000000;
}


@media (max-width: 768px) {
  .signupFormBody{
    width: auto;
    margin: 90px auto auto auto;
    border: none;
  }

  .bgImage{
    margin: 90px auto auto auto;
    height: 360px;
  }

  .sideBtn{
    width: 100%;
    margin:0px auto;
    display: block;

  }

  .sideBtn2{
    display:block;
    width: 250px;
    margin: 0px auto;
  }

  #login-btn{
    display: inline-block;
    margin: 7px;
    float: left;
  }

  #signup-btn{
    display: inline-block;
    float: right;
    margin: 7px;
  }


  .profileImage{
    /* margin-top: 150px; */
    width: 100px;
    height: 100px;
    border: 3px solid #000000;
    border-radius: 50%;
    background-color: #DCDBDB;
    margin: 200px auto 0px auto;
  }

  .profileName{
    width: auto;
    margin: auto;
    text-align: center
  }

  .myImagesDiv{
    margin-top: 110px;
  }

  .profileImagesTitle{
    display: block;
    width: 200px;
    margin: auto;
    text-align: center
  }

  .editicon{
    width: 50px;
    height: 50px;
    position: relative;
    bottom: 140px;
    left: 75px;
  }

  .profileInput{
    width: 100%;
    display: block;
    margin: 0 auto;
  }

  .uploadProfileBtn{
    width: 100%;
    display: block;
    margin: 5px auto;
  }

  .closebtn{
    width: 100%;
    display: block;
    margin: 0 auto;
  }

  ul.nav.justify-content-end{
    width: 100%;
  }
}
