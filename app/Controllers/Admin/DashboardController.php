<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use Tatter\Visits\Models\VisitModel;
use App\Models\UserModel;
use App\Models\StudyReferenceModel;
use App\Models\StudyModuleModel;
use App\Models\SharingPracticeModel;

class DashboardController extends BaseController
{
    private $VisitModel, $UserModel;

    public function __construct()
    {
        $this->VisitModel = new VisitModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $countJanuaryVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('01'))->findAll();
        $countFebruaryVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('02'))->findAll();
        $countMarchVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('03'))->findAll();
        $countAprillVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('04'))->findAll();
        $countMayVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('05'))->findAll();
        $countJuneVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('06'))->findAll();
        $countJulyVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('07'))->findAll();
        $countAugustVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('08'))->findAll();
        $countSeptemberVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('09'))->findAll();
        $countOktoberVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('10'))->findAll();
        $countNovemberVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('11'))->findAll();
        $countDecemberVideo = $this->VisitModel->where('path', '/study-references')->where('MONTH(created_at)', date('12'))->findAll();

        $countJanuaryModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('01'))->findAll();
        $countFebruaryModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('02'))->findAll();
        $countMarchModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('03'))->findAll();
        $countAprillModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('04'))->findAll();
        $countMayModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('05'))->findAll();
        $countJuneModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('06'))->findAll();
        $countJulyModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('07'))->findAll();
        $countAugustModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('08'))->findAll();
        $countSeptemberModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('09'))->findAll();
        $countOktoberModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('10'))->findAll();
        $countNovemberModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('11'))->findAll();
        $countDecemberModule = $this->VisitModel->where('path', '/study-modules')->where('MONTH(created_at)', date('12'))->findAll();

        $listPlatforms = [];
        $countPlatform = [];
        $platforms = $this->VisitModel->select('platforms')->groupBy('platforms')->findAll();
        foreach ($platforms as $platform) {
            $listPlatforms[] = $platform->platforms;
        }

        foreach ($listPlatforms as $listPlatform) {
            $countPlatform[] = $this->VisitModel->where('platforms', $listPlatform)->countAllResults();
        }

        $data = [
            'countVisitor' => $this->VisitModel->countAllResults(),
            'platforms' => $this->VisitModel->select('platforms')->groupBy(['platforms'])->findAll(),
            'countAccessModule' => [$countJanuaryModule, $countFebruaryModule, $countMarchModule, $countAprillModule, $countMayModule, $countJuneModule, $countJulyModule, $countAugustModule, $countSeptemberModule, $countOktoberModule, $countNovemberModule, $countDecemberModule],
            'countAccessVideo' => [$countJanuaryVideo, $countFebruaryVideo, $countMarchVideo, $countAprillVideo, $countMayVideo, $countJuneVideo, $countJulyVideo, $countAugustVideo, $countSeptemberVideo, $countOktoberVideo, $countNovemberVideo, $countDecemberVideo],
            'studyReferences' => SharingPracticeModel::whereNotNull('category_reference_id')->latest()->limit(10)->get(),
            'studyModules' => SharingPracticeModel::whereNotNull('category_module_id')->latest()->limit(10)->get(),
            'countUsers' => $this->UserModel->countAllResults(),
            'countEveryDayVideo' => $countJanuaryVideo,
            'listPlatforms' => $listPlatforms,
            'countPlatform' => $countPlatform
        ];

        return view('admin/dashboard/index', $data);
    }
}
