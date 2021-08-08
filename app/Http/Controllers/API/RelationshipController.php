<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use PhpParser\Node\Stmt\Foreach_;

class RelationshipController extends Controller
{
    public function userLessons($id)
    {
        $user = User::findOrFail($id)->lessons;
        $feilds = array();
        $filtered = array();
        foreach ($user as $lesson) {
            $fields['Title'] = $lesson->title;
            $fields['Content'] = $lesson->body;
            $filtered[] = $fields;
        }

        return response()->json([
            'data' => $filtered
        ], 200);
    }

    public function lessonTags($id)
    {
        $lesson = Lesson::findOrFail($id)->tags;
        $feilds = array();
        $filtered = array();
        foreach($lesson as $tag) {
            $fields['Tag'] = $tag->name;
            $filtered[] = $fields;
        }

        return response()->json([
            'data' => $filtered
        ], 200);
    }

    public function tagLessons($id)
    {
        $tag = Tag::findOrFail($id)->lessons;
        $feilds = array();
        $filtered = array();
        foreach($tag as $lesson) {
            $fields['Title'] = $lesson->title;
            $fields['Content'] = $lesson->body;
            $filtered[] = $fields;
        }

        return response()->json([
            'data' => $filtered
        ], 200);
    }
}
