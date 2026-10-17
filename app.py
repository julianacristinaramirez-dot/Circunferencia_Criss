# app.py
import math

def bienvenida():
    print("=" * 40)
    print(" PROYECTO: CIRCUNFERENCIA CRIS ")
    print(" Autor: Juliana Cristina Ramírez ")
    print("=" * 40)
    print("Este es un script de Python complementario")
    print("al sistema web desarrollado en PHP y MySQL.\n")

def calcular_circunferencia(radio):
    if radio <= 0:
        return "El radio debe ser mayor a cero."
    
    area = math.pi * (radio ** 2)
    perimetro = 2 * math.pi * radio
    
    return f"Para un radio de {radio}:\n- Área: {area:.2f}\n- Perímetro: {perimetro:.2f}"

if __name__ == "__main__":
    bienvenida()
    try:
        r = float(input("Ingresa un radio para probar el cálculo en Python: "))
        print(calcular_circunferencia(r))
    except ValueError:
        print("Por favor, ingresa un número válido.")