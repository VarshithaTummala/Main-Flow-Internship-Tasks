let display = document.getElementById('result');
function appendCharacter(char) {
    if (display.value === "Error") {
        display.value = "";
    }
    // Prevent multiple operators
    let lastChar = display.value.slice(-1);
    if (['+', '-', '*', '/'].includes(lastChar) && ['+', '-', '*', '/'].includes(char)) {
        return;
    }

    display.value += char;
}

function clearDisplay() {
    display.value = "";
}

function calculateResult() {
    try {
        if (display.value.trim() === "") return;
        
        let result = eval(display.value);
        
        if (!isFinite(result)) {
            display.value = "Error";
        } else {
            display.value = result;
        }
    } catch (error) {
        display.value = "Error";
    }
}
