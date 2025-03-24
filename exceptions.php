<?php

// try must have one catch or finally
// use throw to thow exceptions
function divide($a, $b) {
    if ($b == 0) {
        throw new Exception("Cannot divide by zero!"); // Throw an exception
    }
    return $a / $b;
}

try {
    echo divide(10, 0);
} catch (Exception $e) {
    echo "Caught Exception: " . $e->getMessage(); // Handle the error
}

//finally
try {
    echo divide(10, 2);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    echo "<br>Execution completed!";
}

// Continue execution
echo "Hello World\n";

//custom exception class
class InvalidAgeException extends Exception {}

function checkAge($age) {
    if ($age < 18) {
        throw new InvalidAgeException("Age must be at least 18.");
    }
    return "Access granted!";
}

try {
    echo checkAge(16);
} catch (InvalidAgeException $e) {
    echo "Age Exception: " . $e->getMessage();
} catch (Exception $e) {
    echo "General Exception: " . $e->getMessage();
}

//catching multiple exceptions
class NetworkException extends Exception {}
class DatabaseException extends Exception {}

try {
    throw new DatabaseException("Database connection failed!");
} catch (NetworkException $e) {
    echo "Network Error: " . $e->getMessage();
} catch (DatabaseException $e) {
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}

//global exception handler
// If an exception is allowed to bubble up to the global scope, it may be caught by a global exception handler if set. 
// The set_exception_handler() function can set a function that will be called in place of a catch block if no other block is invoked.
// The effect is essentially the same as if the entire program were wrapped in a try-catch block with that function as the catch. 
function globalExceptionHandler($exception) {
    error_log("Uncaught Exception: " . $exception->getMessage(), 3, "errors.log");
    echo "An error occurred! Please try again later.";
}
set_exception_handler("globalExceptionHandler");

// This will be caught by the global handler
throw new Exception("Something went wrong!");
