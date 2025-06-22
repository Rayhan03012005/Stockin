<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role'];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function transactionsAsPeminjam()
    {
        return $this->hasMany(Transaction::class, 'peminjam_id');
    }

    public function transactionsAsOwner()
    {
        return $this->hasMany(Transaction::class, 'owner_id');
    }

    public function borrowedItems()
    {
        return $this->belongsToMany(Item::class, 'item_peminjam', 'peminjam_id', 'item_id');
    }
}




    // protected $fillable = [
    //     'name', 'email', 'password', 'role',
    // ];

    // protected $hidden = [
    //     'password',
    // ];

    // public function profile()
    // {
    //     return $this->hasOne(Profile::class);
    // }
