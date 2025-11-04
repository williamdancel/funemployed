<?php
// app/Models/Message.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'is_anonymous',
        'room'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

            // For anonymous messages
            public function getDisplayNameAttribute()
            {
                if ($this->is_anonymous) {
                    $anonymousNames = [
                    // 👨‍💻 Developer / Techy
                    'Anonymous_Coder', 'Job_Hunter_Anon', 'Resting_Dev', 
                    'Chill_Seeker', 'Break_Taker', 'Future_Employed',
                    'Coffee_Lover', 'Portfolio_Builder', 'Memelord',
                    'Bug_Free_Dreamer', 'Debugging_Life', 'Keyboard_Warrior', 
                    'Deadline_Dodger', 'Code_Nomad', 'Async_Thinker',
                    'DarkMode_Enjoyer', 'Remote_Legend', 'Pixel_Pusher',
                    'AFK_Developer', 'SnackDriven_Coder', 'Zen_Mode_Dev',
                    'ErrorHandler', 'Syntax_Survivor', 'Refactor_Ranger',

                    // 🧘 Chill / Funemployed vibes
                    'Netflix_Scholar', 'Pajama_Professional', 'SnackTime_Expert',
                    'LateSleeper', 'Morning_Daydreamer', 'Siesta_Master',
                    'Weekend_Mode', 'Soft_Life_Enjoyer', 'BingeWatcher',
                    'Vibe_Chaser', 'Nap_Enthusiast', 'Jobless_But_Joyful',
                    'Breaktime_Boss', 'Peaceful_Person', 'Homebody_Hero',
                    'Dream_Catcher', 'Unbothered_Soul', 'Relaxation_Specialist',
                    'Mentally_On_Vacation', 'Sunset_Thinker', 'Calm_Navigator',

                    // 💬 General / Funny nicknames
                    'Meme_Dealer', 'Overthinker_101', 'Chatty_Ghost',
                    'Procrastination_Champion', 'Mystery_Human', 'Serious_NotSerious',
                    'Hungry_Again', 'WaterDrinker', 'Budget_Traveler',
                    'Employed_Soon', 'Hopeful_Applicant', 'The_Silent_Observer',
                    'JustPassingBy', 'RandomThoughts', 'Social_Potato',
                    'Unseen_Commenter', 'Optimist_Anon', 'Curious_Soul',
                    'Sarcastic_Mind', 'Rainy_Daydreamer', 'Laughing_Inside'
                ];
            $index = crc32($this->user_id . $this->created_at) % count($anonymousNames);
            return $anonymousNames[$index] . '_' . substr($this->user_id, -2);
        }
        
        return $this->user->name;
    }

    public function getDisplayAvatarAttribute()
    {
        $avatars = ['😎', '🤠', '🧐', '🤓', '😊', '🤩', '😄', '😋', '👻', '🦄', '🐶', '🐱'];
        $seed = $this->is_anonymous ? $this->user_id : $this->user->id;
        $index = $seed % count($avatars);
        return $avatars[$index];
    }
}