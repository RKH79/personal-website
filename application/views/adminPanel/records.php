<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="table-data__tool">
    <div class="table-data__tool-left"></div>
    <div class="table-data__tool-right">
        <a href="recordOperation" class="au-btn au-btn-icon au-btn--green au-btn--small">
            <i class="zmdi zmdi-plus"></i>افزودن رکورد جدید
        </a>
    </div>
</div>
<div class="table rtl">
    <div class="t-head table-row posts tr-shadow">
        <div class="tableHead-cell">عنوان رکورد</div>
        <div class="tableHead-cell">تاریخ ثبت رکورد</div>
        <div class="tableHead-cell">آپلود فایل</div>
        <div class="tableHead-cell"></div>
    </div>
    <?php foreach ($records as $record):
        switch (strrchr(strtolower($record->link),".")) {
            case ('.zip'||'.rar'||'.7zip'):
                $icon = "zmdi-archive";
                break;
            case ('.mp4'||'.mkv'||'.3gp'):
                $icon = "zmdi-movie";
                break;
            case ('.mp3'||'.wav'||'.wma'):
                $icon = "zmdi-audio";
                break;
            case ('.jpg'||'.jpeg'||'.png'):
                $icon = "zmdi-image";
                break;
            case ('.pdf'||'.docx'||'.doc'):
                $icon = "zmdi-assignment";
                break;
            default:
                $icon = "zmdi-download";
                break;
        }
        ?>
        <div class="t-body table-row posts tr-shadow">
            <div class="table-cell"><?= $record->title ?></div>
            <div class="table-cell"><?= $this->jdf->tr_num($this->jdf->dateCompare($record->recordDate,1),'fa')  ?></div>
            <div class="table-cell"><a class="d-block" href="assets/uploads/<?= $record->link ?>" download><div style="margin-bottom: -4px;" class="downloadLink d-inline-block"><i class="zmdi <?= $icon ?>"></i></div><div class="d-inline-block"><?= $record->link ?></div></a></div>
            <div class="table-cell">
                <div class="table-data-feature">
                    <a href="recordOperation<?=$record->id?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="zmdi zmdi-edit"></i>
                    </a>
                    <a href="removeRecord<?=$record->id?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
    <?php endforeach; ?>
</div