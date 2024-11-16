// Definir el pin del LED
int ledPin = 13;

// Definir el código Morse para cada letra
// '.' = corto, '-' = largo
String morse[] = {
  ".-",   // A
  "-...", // B
  "-.-.", // C
  "-..",  // D
  ".",    // E
  "..-.", // F
  "--.",   // G
  "....",  // H
  "..",    // I
  ".---",  // J
  "-.-",   // K
  ".-..",  // L
  "--",    // M
  "-.",    // N
  "---",   // O
  ".--.",  // P
  "--.-",  // Q
  ".-.",   // R
  "...",   // S
  "-",     // T
  "..-",   // U
  "...-",  // V
  ".--",   // W
  "-..-",  // X
  "-.--",  // Y
  "--.."   // Z
};

// Función para encender y apagar el LED
void dot() {
  digitalWrite(ledPin, HIGH);
  delay(250); // 250 ms para el punto
  digitalWrite(ledPin, LOW);
  delay(250); // Pausa entre los puntos
}

void dash() {
  digitalWrite(ledPin, HIGH);
  delay(500); // 500 ms para la raya
  digitalWrite(ledPin, LOW);
  delay(250); // Pausa entre las rayas
}

// Función para mostrar el código morse de una letra
void sendMorse(char letter) {
  if (letter >= 'a' && letter <= 'z') {
    int index = letter - 'a';  // Convertir la letra a su índice
    String morseCode = morse[index];

    for (int i = 0; i < morseCode.length(); i++) {
      if (morseCode.charAt(i) == '.') {
        dot(); // Punto
      } else if (morseCode.charAt(i) == '-') {
        dash(); // Raya
      }
    }
  }
  delay(500); // Pausa entre letras
}

void setup() {
  pinMode(ledPin, OUTPUT);  // Definir el pin del LED como salida
  Serial.begin(9600);
}

void loop() {
  String message = "hola mundo";  // Mensaje que se enviará en código morse

  // Recorrer cada letra del mensaje
  for (int i = 0; i < message.length(); i++) {
    char letter = message.charAt(i);
    if (letter != ' ') {
      sendMorse(tolower(letter));  // Enviar morse, ignorar mayúsculas
    }
    delay(1000);  // Pausa entre palabras
  }

  delay(5000);  // Espera antes de repetir el mensaje
}
