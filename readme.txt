How to calculate the Easter date for a given year using Gauss’ Algorithm

Given an integer Y, denoting a year, as input, the task is to find the date of Easter for that year.

Examples: 

    Input: Y = 2020 
    Output: 2020-04-12 
    Explanation: In 2020, Easter was on 12 April. Hence, Easter date will be 2020-04-12

    Input: Y = 1991 
    Output: 1991-03-30 
    Explanation: In 1991, Easter was on 30 March. Hence, Easter date will be 1991-03-30 

Approach: Gauss Easter Algorithm is used to easily calculate the date of Easter for a year. This algorithm was first thought of by Carl Friedrich Gauss. There is no proper explanation on how Gauss landed up with this algorithm, but the implementation of this algorithm has proved to be very accurate. 
A detailed explanation of the Gauss Easter Algorithm is as follows: 

    First, calculate the location of the year Y in the Metonic cycle.

    A = Y mod 19

    Now, find the number of leap days according to Julian’s calendar.

    B = Y mod 4

    Then, let’s take into account that the non-leap year is one day longer than 52 weeks.

    C = Y mod 7

    M depends on the century of year Y. For 19th century, M = 23. For the 21st century, M = 24 and so on. 
    It is calculated using the following relations:

    P = floor (Y / 100) 
    Q = ((13 + 8 * P) / 25) 
    M = (15 – Q + P – (P / 4)) mod 30 

    The difference between the number of leap days between the Julian and the Gregorian calendar is given by:

    N = (4 + P – (P / 4)) mod 7

    The number of days to be added to March 21 to find the date of the Paschal Full Moon is given by:

    D = (19*A + M) mod 30

    And, the number of days from the Paschal full moon to the next Sunday is given by:

    E = (N + 2*B + 4*C + 6*D) mod 7 

    Therefore, using D and E, the date of Easter Sunday is going to be March (22 + D + E). If this number comes out to be greater than 31, then we move to April.
    Now the lunar month is not exactly 30 days but a little less than 30 days. So to nullify this inconsistency, the following cases are followed:

    if (D == 29) and (E == 6) 
    return “April 19” 
    else if (D == 28) and (E == 6) 
    return “April 18” 


