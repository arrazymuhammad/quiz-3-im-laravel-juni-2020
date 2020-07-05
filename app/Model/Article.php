<?php

namespace App\Model;

use Carbon\Carbon;
use DB;
use Illuminate\Support\Str;

class Article 
{
    protected $date = ['created_at', 'updated_at'];

    public function __construct()
    {
        foreach (func_get_arg(0) as $key => $value) {
            $this->{$key} = $value;
            if(in_array($key, $this->date)) $this->{$key} = Carbon::parse($value);
        }
    }

    public function tag()
    {
        return json_decode($this->tags);
    }

    public static function all()
    {
        return DB::table('articles')->get()->map(function($item){
            return new Article($item);
        });
    }

    public static function findOrFail($id){
        $find = DB::table('articles')->where('uuid', $id)->get()->first();
        if($find) return new Article($find);
        return abort(404);
    }

    public static function create($data)
    {
        $tags = collect(explode(',', $data['tags']))->map(fn($item) => trim($item));
        $data['uuid'] = Str::uuid();
        $data['tags'] = json_encode($tags);
        $data['slug'] = Str::slug($data['title']);
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = date("Y-m-d H:i:s");
        return DB::table('articles')->insert($data);
    }

    public function update($data){
        $data['tags'] = json_encode(collect(explode(',', $data['tags']))->map(fn($item) => trim($item)));
        $data['updated_at'] = date("Y-m-d H:i:s");
        DB::table('articles')->where('uuid', $this->uuid)->update($data);
    }

    public static function destroy($id)
    {
        return DB::table('articles')->where('uuid', $id)->delete();
    }

    public static function findByTag($tag)
    {
        return DB::table('articles')
                 ->whereJsonContains('tags', $tag)
                 ->get()
                 ->map(function($item){
                    return new Article($item);
                 });;
    }
}
