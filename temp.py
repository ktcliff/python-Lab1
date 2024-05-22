import sys

def celsius_to_fahrenheit(celsius):


    return (celsius * 9/5) + 32

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python temp.py <temperature_in_celsius>")
        sys.exit(1)

    try:
        celsius = float(sys.argv[1])
        fahrenheit = celsius_to_fahrenheit(celsius)
        print(f"{fahrenheit}")
    except ValueError:
        print("Please enter a valid number for the temperature.")
        sys.exit(1) 