<?php
namespace App\View\Components;

trait FlashMessages
{
  protected static function message($level = 'info', $message = null, $title = null)
  {
      if (session()->has('messages')) {
          $messages = session()->pull('messages');
      }

      $messages[] = $message = ['level' => $level, 'message' => $message, 'title' => $title];

      session()->flash('messages', $messages);

      return $message;
  }

  protected static function messages()
  {
      return self::hasMessages() ? session()->pull('messages', 'title') : [];
  }

  protected static function hasMessages()
  {
      return session()->has('messages');
  }

  protected static function success($message, $title)
  {
      return self::message('success', $message, $title);
  }

  protected static function info($message, $title)
  {
      return self::message('info', $message, $title);
  }

  protected static function warning($message, $title)
  {
      return self::message('warning', $message, $title);
  }

  protected static function danger($message, $title)
  {
      return self::message('danger', $message, $title);
  }
}

?>