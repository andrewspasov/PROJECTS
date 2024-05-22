<x-layouts.layout>
    <x-slot:title>
        Contact Page
        </x-slot>
        </x-layout>

        @extends('layouts.master')

        @section('content')

        <div class="banner" id="banner-contact">
            <div class="container text-center text-white p-5">
                <div class="row">
                    <div class="col" id="contact-text">
                        <h1>Contact Me</h1>
                        <p>Have questions? I have answers!</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="container py-5 px-5">
            <div class="row">
                <div class="col">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="email">Phone Number</label>
                            <input type="tel" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button class="btn btn-info">SEND</button>
                    </form>
                </div>
            </div>
        </div>

        @endsection