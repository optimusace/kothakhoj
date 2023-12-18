@extends("layouts.appLayout2")

@section("title","Appointment")

@section("css")
    <link rel="stylesheet" href="css/appointment.css">
@endsection

@section("content")

    <!-- BOYD CONTENT HTML -->
    <div class="content">
        <form action="" method="">
            <p class="content-title">Select date and time for the appointment</p>
            <div class="date">
                <p class="date-title">What date would you like to visit?</p>
                <div class="date-options">
                    <select name="year">
                        <option value="" disabled selected>Year</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                    <select name="month">
                        <option value="" disabled selected>Month</option>
                        <option value="janaury">Janaury</option>
                        <option value="february">February</option>
                    </select>
                    <select class="day">
                        <option value="" disabled selected>Day</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>

            <div class="time">
                <p class="time-title">What time would you like to visit?</p>
                <div class="time-options">
                    <select name="hour">
                        <option value="" disabled selected>Hour</option>
                        <option value="00">00</option>
                        <option value="01">01</option>
                    </select>
                    <select name="minute">
                        <option value="" disabled selected>Minute</option>
                        <option value="00">00</option>
                        <option value="01">01</option>
                    </select>
                    <select name="am-pm">
                        <option value="am">AM</option>
                        <option value="pm">PM</option>
                    </select>
                </div>
            </div>
            <div class="message">
                <p class="message-title">Some messages?</p>
                <textarea name="message" cols="30" rows="6"></textarea>
            </div>
            <div class="submit">
                <input type="submit" value="BOOK APPOINTMENT">
                <p>OR</p>
                <p><i class="fa-solid fa-phone"></i>+977-1234567890</p>
            </div>
        </form>
    </div>


@endsection