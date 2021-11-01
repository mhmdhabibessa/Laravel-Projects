<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\Schedule;
use Livewire\Component;

class RegisterStudent extends Component
{
    public $schedule;
    //FORM START
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $email;
    public $dob;
    //FORM END

    public function mount(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'first_name' => 'required|string|min:3|max:75',
            'middle_name' => 'required|string|min:3|max:75',
            'last_name' => 'required|string|min:3|max:75',
            'gender' => 'required|in:Male,Female',
            'email' => 'required|email|min:3|max:255',
            'dob' => 'required|date_format:d-m-Y|before_or_equal:'.$this->schedule->max_dob.'|after_or_equal:'.$this->schedule->min_dob,
        ]);
        $discountable = 0;
        if ($this->schedule->level === 1) {
            $discountable = $this->schedule->price;
        }
        Cart::add([
            'id' => rand(11111, 99999),
            'schedule_id' => $this->schedule->id,
            'level' => $this->schedule->level,
            'course_title' => "{$this->schedule->course->name} - {$this->schedule->name}",
            'name' => $validatedData['first_name'].' '.$validatedData['middle_name'].' '.$validatedData['last_name'],
            'gender' => $validatedData['gender'],
            'email' => $validatedData['email'],
            'dob' => $validatedData['dob'],
            'price' => $this->schedule->price,
            'discountable' => $discountable
        ]);
        $this->emit('itemAdded');
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->to('/'.app()->getLocale().'/courses/'.$this->schedule->course->slug);
    }

    public function render()
    {
        return view('livewire.register-student');
    }
}
