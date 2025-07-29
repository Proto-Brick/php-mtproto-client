// File: src/cpp/primemodule.cpp

#include <iostream>
#include <stdexcept>
#include <cstdint>
#include <string>  // Для std::stoull
#include <random>  // Для криптостойкого генератора

namespace PrimeModule {
    // Используем std::gcd из стандарта C++17, он эффективен.
    // Если у вас компилятор старше, можно вернуть вашу реализацию.
    #include <numeric> // Для std::gcd
    
    // Функция факторизации числа (алгоритм Полларда-Брента)
    uint64_t factorize(uint64_t number) {
        // 1. Инициализация криптостойкого генератора случайных чисел
        std::random_device rd;
        std::mt19937_64 gen(rd());
        std::uniform_int_distribution<uint64_t> distrib(1, number - 1);
        std::uniform_int_distribution<uint64_t> distrib_c(1, number - 1);

        if (number % 2 == 0) return 2;
        if (number % 3 == 0) return 3;

        uint64_t y = distrib(gen);
        uint64_t c = distrib_c(gen);
        uint64_t m = 100; // Количество итераций в пакете

        uint64_t g = 1, r = 1, q = 1;
        uint64_t x, ys;

        while (g == 1) {
            x = y;
            for (uint64_t i = 0; i < r; ++i) {
                // y = (y * y + c) % number;
                // Используем __int128 для предотвращения переполнения при умножении
                y = ((unsigned __int128)y * y + c) % number;
            }

            uint64_t k = 0;
            while (k < r && g == 1) {
                ys = y;
                for (uint64_t i = 0; i < std::min(m, r - k); ++i) {
                    y = ((unsigned __int128)y * y + c) % number;
                    q = (unsigned __int128)q * (x > y ? x - y : y - x) % number;
                }
                g = std::gcd(q, number);
                k += m;
            }
            r *= 2;
        }

        if (g == number) {
            while (true) {
                ys = ((unsigned __int128)ys * ys + c) % number;
                g = std::gcd(x > ys ? x - ys : ys - x, number);
                if (g > 1) break;
            }
        }
        
        // Алгоритм может вернуть само число, если оно простое, или 1 при ошибке.
        // Нам нужен нетривиальный делитель.
        if (g > 1 && g < number) {
            return g;
        }

        // Если не удалось найти, возвращаем 0 как признак неудачи.
        return 0;
    }
}

// FFI-совместимая функция
extern "C" int64_t factorizeFFI(const char *number_str) {
    try {
        uint64_t num = std::stoull(number_str);
        if (num <= 1) return 0;

        uint64_t result = PrimeModule::factorize(num);
        
        // Возвращаем результат. 0 означает неудачу.
        return static_cast<int64_t>(result);

    } catch (const std::exception& e) {
        // В случае ошибки (например, stoull не смог распарсить) возвращаем -1
        return -1;
    }
}