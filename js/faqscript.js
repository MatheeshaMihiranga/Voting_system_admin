function toggleAnswer(question) {
    question.nextElementSibling.classList.toggle('show');
    question.querySelector('.arrow').classList.toggle('active');
}
