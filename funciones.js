function validarContrasenia(password) {
  // Verificar longitud
  if (password.length < 8 || password.length > 16) {
    return false;
  }

  let tieneMayuscula = false;
  let tieneMinuscula = false;
  let tieneNumero = false;
  let tieneEspecial = false;
  let consecutivos = 1;
  let caracterAnterior = '';

  for (let i = 0; i < password.length; i++) {
    const caracter = password[i];

    // Verificar mayúsculas
    if (caracter >= 'A' && caracter <= 'Z') {
      tieneMayuscula = true;
    }
    // Verificar minúsculas
    else if (caracter >= 'a' && caracter <= 'z') {
      tieneMinuscula = true;
    }
    // Verificar números
    else if (caracter >= '0' && caracter <= '9') {
      tieneNumero = true;
    }
    // Verificar caracteres especiales
    else if ("!@#$%^&*()_+-=[]{}|;:,.<>?".includes(caracter)) {
      tieneEspecial = true;
    }

    // Verificar caracteres consecutivos
    if (caracter === caracterAnterior) {
      consecutivos++;
      if (consecutivos > 3) {
        return false;
      }
    } else {
      consecutivos = 1;
    }
    caracterAnterior = caracter;
  }

  // Verificar que se cumplan todos los criterios
  return tieneMayuscula && tieneMinuscula && tieneNumero && tieneEspecial;
}

// Ejemplo de uso
console.log(validarContrasenia("Abc123!@#")); // true
console.log(validarContrasenia("abc123")); // false (falta mayúscula y carácter especial)
console.log(validarContrasenia("ABCDEF123!")); // false (falta minúscula)
console.log(validarContrasenia("Abcdef123!")); // true
console.log(validarContrasenia("Abcaaaa123!")); // false (más de 3 caracteres iguales seguidos)
console.log(validarContrasenia("Abc123!@#$%^&*()_+-=")); // false (más de 16 caracteres)



document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');
  const mensajeError = document.getElementById('mensajeError');

  form.addEventListener('submit', function(event) {
      let errores = [];

      // Validar nombre
      const nombre = document.getElementById('nombre');
      if (nombre.value.trim() === '') {
          errores.push('El nombre es obligatorio.');
      }

      // Validar correo
      const correo = document.getElementById('correo');
      if (correo.value.trim() === '') {
          errores.push('El correo electrónico es obligatorio.');
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo.value)) {
          errores.push('El formato del correo electrónico no es válido.');
      }

      // Validar contraseña
      const pass = document.getElementById('pass');
      if (pass.value === '') {
          errores.push('La contraseña es obligatoria.');
      }else if(!validarContrasenia(pass.value)){
        errores.push('El formasto de contraseña no es valido');
      }

      // Validar fecha
      const fecha = document.getElementById('fecha');
      if (fecha.value === '') {
          errores.push('La fecha de antigüedad es obligatoria.');
      }

      // Validar color (opcional)
      const colores = document.querySelectorAll('input[name="eligeColor"]');
      let colorSeleccionado = false;
      colores.forEach(color => {
          if (color.checked) {
              colorSeleccionado = true;
          }
      });
      if (!colorSeleccionado) {
          errores.push('Por favor, selecciona un color.');
      }

      // Validar aceptación de políticas
      const aceptoPoliticas = document.getElementById('aceptoPoliticas');
      if (!aceptoPoliticas.checked) {
          errores.push('Debes aceptar las políticas de privacidad.');
      }

      // Si hay errores, mostrarlos y prevenir el envío del formulario
      if (errores.length > 0) {
          event.preventDefault();
          mensajeError.textContent = errores.join(' ');
          mensajeError.classList.remove('d-none'); 
      } else {
          mensajeError.classList.add('d-none');
      }
  });
});