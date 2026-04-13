// variables for opening the right tables
const theme = document.getElementById("navTheme");
const tableTheme = document.getElementById("tableTheme");
const question = document.getElementById("navQuestion");
const tableQuestion = document.getElementById("tableQuestion");

// variables for editing and adding theme's and questions
const openThemeBtn = document.getElementById("openTheme");
const themePopup = document.getElementById("popupThema");
const closeThemeBtn = document.getElementById("closeTheme");
const openThemeDelBtn = document.getElementById("openThemeDel");
const themeDelPopup = document.getElementById("popupThemaDel");
const closeThemeDelBtn = document.getElementById("closeThemeDel");

const openQuestionBtn = document.getElementById("openQuestion");
const questionPopup = document.getElementById("popupQuestion");
const closeQuestionBtn = document.getElementById("closeQuestion");
const openQuestionDelBtn = document.getElementById("openQuestionDel");
const questionDelPopup = document.getElementById("popupQuestionDel");
const closeQuestionDelBtn = document.getElementById("closeQuestionDel");

const openChatDelBtn = document.getElementById("openChatDel");
const chatDelPopup = document.getElementById("popupChatDel");
const closeChatDelBtn = document.getElementById("closeChatDel");

function open(element) {
        element.classList.remove("hidden");
}

function close(element) {
        element.classList.add("hidden");
}

//switching with the side nav
theme.addEventListener("click", function () {
    open(tableTheme);
        theme.classList.add("active");
    close(tableQuestion);
        question.classList.remove("active");
})

question.addEventListener("click", function () {
    open(tableQuestion);
        question.classList.add("active");
    close(tableTheme);
        theme.classList.remove("active");
})


// opening and closing of popups or switching to a different popup
openThemeBtn.addEventListener("click", function () {
    open(themePopup);
});
closeThemeBtn.addEventListener("click", function () {
    close(themePopup);
});
openThemeDelBtn.addEventListener("click", function () {
    close(themePopup);
    open(themeDelPopup);
});
closeThemeDelBtn.addEventListener("click", function () {
    open(themePopup);
    close(themeDelPopup);
});

openQuestionBtn.addEventListener("click", function () {
    open(questionPopup);
});
closeQuestionBtn.addEventListener("click", function () {
    close(questionPopup);
});
openQuestionDelBtn.addEventListener("click", function () {
    close(questionPopup);
    open(questionDelPopup);
});
closeQuestionDelBtn.addEventListener("click", function () {
    open(questionPopup);
    close(questionDelPopup);
});

openChatDelBtn.addEventListener("click", function () {
    open(chatDelPopup);
});
closeChatDelBtn.addEventListener("click", function () {
    close(chatDelPopup);
});
