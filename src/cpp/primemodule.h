// File: src/cpp/primemodule.h
// Он же используется как primemodule-ffi.h

#ifndef FACTORIZATION_H
#define FACTORIZATION_H

#include <cstdint>

// Прототип функции для факторизации числа.
// Возвращает int64_t для лучшей совместимости с FFI.
// 0 - неудача, -1 - ошибка парсинга, > 1 - найденный множитель.
extern "C" int64_t factorizeFFI(const char* number);

#endif // FACTORIZATION_H