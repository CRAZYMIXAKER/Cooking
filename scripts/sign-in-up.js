const registration = document.querySelector(".main__title-registration");
const autorization = document.querySelector(".main__title-autorization");
const signUp = document.querySelector(".form__sign-up");
const signIn = document.querySelector(".form__sign-in");

registration.addEventListener("click", SignUp);
autorization.addEventListener("click", SignIn);

function SignUp() {
  registration.classList.add("main__title--background");
  autorization.classList.remove("main__title--background");
  signUp.classList.add("form__sign--opened");
  signIn.classList.remove("form__sign--opened");
}

function SignIn() {
  autorization.classList.add("main__title--background");
  registration.classList.remove("main__title--background");
  signIn.classList.add("form__sign--opened");
  signUp.classList.remove("form__sign--opened");
}
