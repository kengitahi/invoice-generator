@extends('errors::layout')

<div class="flex flex-col-reverse items-center justify-center h-full gap-16 px-4 py-24 bg-white md:gap-28 md:px-44 md:py-20 lg:flex-row lg:px-24 lg:py-24">
    <div class="relative w-full pb-12 lg:pb-0 xl:w-1/2 xl:pt-24">
        <div class="relative">
            <div class="absolute">
                <div class="">
                    <h1 class="my-2 text-2xl font-bold text-gray-800 font-heading">
                        Looks like you've found the doorway to a page that does not exist.
                    </h1>
                    <p class="my-2 text-gray-800">Sorry about that! Please return to the homepage to get to where you need to go.
                    </p>
                    <x-links.link type="primary" href="/">
                        Take me home!
                    </x-links.link>
                </div>
            </div>
            <div>
                <img src="https://i.ibb.co/G9DC8S0/404-2.png" />
            </div>
        </div>
    </div>
    <div>
        <img src="https://i.ibb.co/ck1SGFJ/Group.png" />
    </div>
</div>
